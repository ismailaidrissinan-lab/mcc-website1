@extends('layouts.admin')

@section('title', 'Manage Training Programs')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-mcc-slate-200 overflow-hidden">
    <div class="p-6 border-b border-mcc-slate-100 flex items-center justify-between bg-white">
        <div>
            <h3 class="text-xl font-bold text-mcc-slate-900">Training Programs</h3>
            <p class="text-sm text-mcc-slate-500 mt-1">Manage talent development and local workforce initiatives.</p>
        </div>
        <a href="{{ route('admin.training.create') }}" class="btn-corporate bg-mcc-blue-600 text-white hover:bg-mcc-blue-700">
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add New Program
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="text-mcc-slate-400 text-xs uppercase tracking-widest bg-mcc-slate-50">
                    <th class="px-6 py-4 font-medium">Title</th>
                    <th class="px-6 py-4 font-medium">Location</th>
                    <th class="px-6 py-4 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-mcc-slate-100">
                @foreach($programs as $program)
                <tr class="hover:bg-mcc-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-mcc-slate-900">{{ $program->title }}</div>
                        <div class="text-xs text-mcc-slate-500 line-clamp-1 max-w-xs">{{ $program->description }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-mcc-slate-600">{{ $program->location }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.training.edit', $program) }}" class="text-mcc-blue-600 hover:text-mcc-blue-800 text-sm font-bold">Edit</a>
                        <form action="{{ route('admin.training.destroy', $program) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this program?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-bold">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if($programs->hasPages())
    <div class="p-6 border-t border-mcc-slate-100">
        {{ $programs->links() }}
    </div>
    @endif
</div>
@endsection
