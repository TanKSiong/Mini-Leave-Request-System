<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Requests</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen antialiased selection:bg-indigo-500 selection:text-white">

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="mb-12 text-center">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 tracking-tight sm:text-5xl">
            Leave Requests
        </h1>
        <p class="mt-4 text-lg text-slate-600 max-w-2xl mx-auto">
            Submit your time off and track existing requests in one place.
        </p>
    </div>

    @if (session('success'))
    <div class="mb-8 rounded-xl bg-teal-50 p-4 border border-teal-200 shadow-sm transition-all duration-300 transform hover:scale-[1.01]" role="alert">
        <div class="flex items-center">
            <svg class="h-5 w-5 text-teal-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <p class="text-sm font-medium text-teal-800">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        <!-- Form Section -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 to-purple-500"></div>
                <div class="p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        New Request
                    </h2>
                    
                    <form action="{{ url('/leave-requests') }}" method="POST" class="space-y-5">
                        @csrf
                        
                        <div>
                            <label for="name" class="block text-sm font-semibold text-slate-700 mb-1">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-sm transition-all duration-200 py-2.5 px-3" placeholder="Jane Doe" required>
                            @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="start_date" class="block text-sm font-semibold text-slate-700 mb-1">Start Date</label>
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" class="block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-sm transition-all duration-200 py-2.5 px-3" required>
                                @error('start_date') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-semibold text-slate-700 mb-1">End Date</label>
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" class="block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-sm transition-all duration-200 py-2.5 px-3" required>
                                @error('end_date') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="reason" class="block text-sm font-semibold text-slate-700 mb-1">Reason</label>
                            <textarea name="reason" id="reason" rows="3" class="block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-sm transition-all duration-200 py-2.5 px-3" placeholder="Vacation, sick leave, etc." required>{{ old('reason') }}</textarea>
                            @error('reason') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="w-full inline-flex justify-center items-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200 group">
                            Submit Request
                            <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- List Section -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50 flex flex-col xl:flex-row xl:items-center justify-between gap-4">
                    <div class="flex items-center space-x-3">
                        <h3 class="text-lg font-bold text-slate-800">Recent Requests</h3>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                            {{ $requests->count() }} total
                        </span>
                    </div>
                    
                    <form action="{{ url('/leave-requests') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-2">
                        <div class="relative w-full sm:w-auto">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or reason..." class="block w-full pl-9 pr-3 py-1.5 border border-slate-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500 bg-white shadow-sm transition-colors">
                        </div>
                        <select name="status" class="block w-full sm:w-auto py-1.5 pl-3 pr-8 border border-slate-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500 bg-white shadow-sm transition-colors" onchange="this.form.submit()">
                            <option value="">All Statuses</option>
                            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                        <button type="submit" class="hidden">Filter</button>
                    </form>
                </div>
                
                @if($requests->isEmpty())
                <div class="p-12 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <h3 class="text-lg font-medium text-slate-900 mb-1">No requests found</h3>
                    <p class="text-slate-500">There are currently no leave requests in the system.</p>
                </div>
                @else
                <ul class="divide-y divide-slate-100">
                    @foreach($requests as $request)
                    <li class="p-6 hover:bg-slate-50 transition-colors duration-150">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center space-x-3 mb-1">
                                    <p class="text-sm font-bold text-slate-900 truncate">{{ $request->name }}</p>
                                    @if($request->status === 'pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 border border-amber-200">Pending</span>
                                    @elseif($request->status === 'approved')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">Approved</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-100 text-rose-800 border border-rose-200">Rejected</span>
                                    @endif
                                </div>
                                <div class="flex items-center text-sm text-slate-500 space-x-4">
                                    <span class="flex items-center">
                                        <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ \Carbon\Carbon::parse($request->start_date)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($request->end_date)->format('M d, Y') }}
                                    </span>
                                </div>
                                <p class="mt-2 text-sm text-slate-600 line-clamp-2">{{ $request->reason }}</p>
                            </div>
                            
                            @if($request->status === 'pending')
                            <div class="ml-4 flex-shrink-0 flex space-x-2">
                                <form action="{{ url('/leave-requests/' . $request->id . '/status') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="inline-flex items-center p-2 border border-transparent rounded-lg text-emerald-700 bg-emerald-100 hover:bg-emerald-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors" title="Approve">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </button>
                                </form>
                                <form action="{{ url('/leave-requests/' . $request->id . '/status') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="inline-flex items-center p-2 border border-transparent rounded-lg text-rose-700 bg-rose-100 hover:bg-rose-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition-colors" title="Reject">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>

</body>
</html>
