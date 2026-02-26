@props(['statesWithProjects' => []])

<div class="nigeria-map-wrapper relative w-full h-auto bg-white rounded-2xl p-4 shadow border border-slate-100"
    x-data="nigeriaMap({{ json_encode($statesWithProjects) }})" x-init="init()" @reset-map.window="resetFilter()">

    <div class="flex items-center justify-between mb-3">
        <h3 class="text-sm font-bold text-slate-700 uppercase tracking-widest">{{ __('Filter by State') }}</h3>
        <template x-if="selectedStateName">
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-semibold"
                    x-text="selectedStateName"></span>
                <button @click="resetFilter()"
                    class="text-slate-400 hover:text-red-500 transition-colors text-xs">✕</button>
            </div>
        </template>
    </div>

    <div id="nigeria-map-container" class="w-full h-auto cursor-pointer relative"></div>

    <!-- Hover Tooltip -->
    <div id="map-tooltip"
        class="absolute pointer-events-none z-50 px-3 py-1.5 bg-mcc-slate-900 text-white text-xs font-bold rounded-lg shadow-lg opacity-0 transition-opacity duration-200 whitespace-nowrap"
        style="transform: translate(-50%, -120%);"></div>

    <template x-if="!selectedStateName">
        <p class="text-center text-xs text-slate-400 mt-2">{{ __('Click a state to filter projects') }}</p>
    </template>
</div>

<style>
    #nigeria-map-container svg {
        width: 100%;
        height: auto;
        filter: drop-shadow(0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1));
    }

    #nigeria-map-container .state-path {
        fill: #f8fafc;
        stroke: #94a3b8;
        stroke-width: 1.2;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    #nigeria-map-container .state-path:hover {
        fill: #cbd5e1;
        stroke: #475569;
        filter: brightness(1.02);
    }

    #nigeria-map-container .state-path.active {
        fill: #1d4ed8 !important;
        stroke: #1e3a8a;
        stroke-width: 1;
        filter: drop-shadow(0 4px 6px -1px rgb(29 78 216 / 0.3));
        opacity: 1 !important;
    }

    #nigeria-map-container .state-label {
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        font-weight: 800;
        fill: #1e293b;
        pointer-events: none;
        letter-spacing: 0.05em;
        paint-order: stroke;
        stroke: #ffffff;
        stroke-width: 2px;
        stroke-linecap: round;
        stroke-linejoin: round;
        transition: all 0.3s ease;
    }

    #nigeria-map-container .state-marker {
        pointer-events: none;
        transition: all 0.3s ease;
    }

    #nigeria-map-container .state-path:hover+.state-label,
    #nigeria-map-container .state-label:hover {
        font-size: 16px;
        fill: #000;
    }
</style>

<script>
    function nigeriaMap(statesWithProjects = []) {
        return {
            selectedState: '{{ request('state') }}',
            selectedStateName: '',
            statesWithProjects: statesWithProjects,

            init() {
                this.loadMap();
            },

            loadMap() {
                fetch('https://cdn.jsdelivr.net/npm/@svg-maps/nigeria@2.0.0/nigeria.svg')
                    .then(r => r.text())
                    .then(svgText => {
                        const container = document.getElementById('nigeria-map-container');
                        if (!container) return;
                        container.innerHTML = svgText;
                        const svg = container.querySelector('svg');
                        if (!svg) return;
                        svg.removeAttribute('width');
                        svg.removeAttribute('height');
                        svg.setAttribute('viewBox', svg.getAttribute('viewBox') || '0 0 744 600');

                        const colors = [
                            '#f8fafc', '#f1f5f9', '#eff6ff', '#f0fdf4',
                            '#fffbeb', '#fef2f2', '#faf5ff', '#f0f9ff',
                            '#ecfdf5', '#fff7ed', '#f5f3ff', '#fdf2f8'
                        ];

                        const paths = svg.querySelectorAll('path[id]');
                        paths.forEach((path, index) => {
                            path.classList.add('state-path');
                            const id = path.getAttribute('id');
                            let label = path.getAttribute('aria-label') || id;

                            // Format to Sentence Case (Lagos instead of LAGOS)
                            label = label.charAt(0).toUpperCase() + label.slice(1).toLowerCase();

                            // Assign multi-color
                            const colorCode = colors[index % colors.length];
                            path.style.fill = colorCode;
                            path.style.opacity = '1.0';

                            if (this.selectedState && id === this.selectedState) {
                                path.classList.add('active');
                                this.selectedStateName = label;
                            }

                            path.addEventListener('click', () => {
                                this.handleStateClick(id, label);
                            });

                            // Hover tooltip
                            path.addEventListener('mouseenter', (e) => {
                                this.showTooltip(e, label);
                            });
                            path.addEventListener('mousemove', (e) => {
                                this.moveTooltip(e);
                            });
                            path.addEventListener('mouseleave', () => {
                                this.hideTooltip();
                            });

                            // Add Label
                            this.addStateLabel(svg, path, label);

                            // Add Logo Marker if state has projects
                            if (this.statesWithProjects.includes(id)) {
                                this.addStateMarker(svg, path);
                            }
                        });
                    })
                    .catch(() => {
                        // Silently fail — map just won't appear
                    });
            },

            addStateLabel(svg, path, name) {
                const bbox = path.getBBox();
                const text = document.createElementNS('http://www.w3.org/2000/svg', 'text');

                let cx = bbox.x + bbox.width / 2;
                let cy = bbox.y + bbox.height / 2;

                if (name === 'Lagos') cy += 5;
                if (name === 'Abia') cy += 3;

                text.setAttribute('x', cx);
                text.setAttribute('y', cy);
                text.setAttribute('text-anchor', 'middle');
                text.setAttribute('class', 'state-label');
                text.textContent = name;

                const area = bbox.width * bbox.height;
                if (area < 1000) {
                    text.style.fontSize = '8px';
                } else if (area < 2500) {
                    text.style.fontSize = '11px';
                }

                svg.appendChild(text);
            },

            addStateMarker(svg, path) {
                const bbox = path.getBBox();
                const image = document.createElementNS('http://www.w3.org/2000/svg', 'image');

                // Position above the label
                let cx = bbox.x + bbox.width / 2;
                let cy = bbox.y + bbox.height / 2;

                const size = 12;
                image.setAttributeNS('http://www.w3.org/1999/xlink', 'href', '{{ asset('images/mcc-logo.png') }}');
                image.setAttribute('x', cx - size / 2);
                image.setAttribute('y', cy - size - 4); // 4px above the center (where label usually is)
                image.setAttribute('width', size);
                image.setAttribute('height', size);
                image.setAttribute('class', 'state-marker');

                svg.appendChild(image);
            },

            handleStateClick(id, name) {
                if (this.selectedState === id) {
                    this.resetFilter();
                } else {
                    this.selectedState = id;
                    this.selectedStateName = name;

                    // Update active class on paths
                    const container = document.getElementById('nigeria-map-container');
                    container.querySelectorAll('.state-path').forEach(p => {
                        p.classList.toggle('active', p.getAttribute('id') === id);
                    });

                    this.$dispatch('state-selected', id);
                }
            },

            resetFilter() {
                this.selectedState = '';
                this.selectedStateName = '';

                const container = document.getElementById('nigeria-map-container');
                container.querySelectorAll('.state-path').forEach(p => {
                    p.classList.remove('active');
                });

                this.$dispatch('state-selected', '');
            },

            showTooltip(e, name) {
                const tooltip = document.getElementById('map-tooltip');
                const wrapper = this.$el;
                tooltip.textContent = name;
                tooltip.style.opacity = '1';
                const rect = wrapper.getBoundingClientRect();
                tooltip.style.left = (e.clientX - rect.left) + 'px';
                tooltip.style.top = (e.clientY - rect.top) + 'px';
            },

            moveTooltip(e) {
                const tooltip = document.getElementById('map-tooltip');
                const wrapper = this.$el;
                const rect = wrapper.getBoundingClientRect();
                tooltip.style.left = (e.clientX - rect.left) + 'px';
                tooltip.style.top = (e.clientY - rect.top) + 'px';
            },

            hideTooltip() {
                const tooltip = document.getElementById('map-tooltip');
                tooltip.style.opacity = '0';
            }
        }
    }
</script>