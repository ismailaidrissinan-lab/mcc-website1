@extends('layouts.admin')

@section('title', 'Manage Awards')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-mcc-slate-200 overflow-hidden">
    <div class="p-6 border-b border-mcc-slate-100 flex items-center justify-between bg-white">
        <div>
            <h3 class="text-xl font-bold text-mcc-slate-900">Awards & Recognition</h3>
            <p class="text-sm text-mcc-slate-500 mt-1">Manage corporate achievements, CSR honors, and donations.</p>
        </div>
        <a href="{{ route('admin.awards.create') }}" class="btn-corporate bg-mcc-blue-600 text-white hover:bg-mcc-blue-700">
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add New Award
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="text-mcc-slate-400 text-xs uppercase tracking-widest bg-mcc-slate-50">
                    <th class="px-6 py-4 font-medium">Year</th>
                    <th class="px-6 py-4 font-medium">Title</th>
                    <th class="px-6 py-4 font-medium">Type</th>
                    <th class="px-6 py-4 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-mcc-slate-100">
                @foreach($awards as $award)
                <tr class="hover:bg-mcc-slate-50 transition-colors">
                    <td class="px-6 py-4 text-sm font-bold text-mcc-blue-600">{{ $award->year }}</td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-mcc-slate-900">{{ $award->title }}</div>
                        <div class="text-xs text-mcc-slate-500 line-clamp-1 max-w-xs">{{ $award->description }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                            {{ $award->type == 'award' ? 'bg-mcc-gold/10 text-mcc-gold' : 
                               ($award->type == 'csr' ? 'bg-mcc-blue-100 text-mcc-blue-700' : 'bg-green-100 text-green-700') }}">
                            {{ ucfirst($award->type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.awards.edit', $award) }}" class="text-mcc-blue-600 hover:text-mcc-blue-800 text-sm font-bold">Edit</a>
                        <form action="{{ route('admin.awards.destroy', $award) }}" method="POST" class="inline-block" class="delete-form">
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
    
    @if($awards->hasPages())
    <div class="p-6 border-t border-mcc-slate-100">
        {{ $awards->links() }}
    </div>
    @endif
</div>
@endsection
