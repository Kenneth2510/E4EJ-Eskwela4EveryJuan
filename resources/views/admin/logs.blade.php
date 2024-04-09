@extends('layouts.admin_layout')

@section('content')
<section class="w-full h-auto text-black md:w-3/4 md:h-screen lg:w-10/12">
    <div class="h-full px-2 py-4 pt-12 rounded-lg shadow-lg md:overflow-auto md:pt-6">
        <div class="flex items-center justify-between p-3 border-b-2 border-gray-300 md:py-8">
            <h1 class="text-2xl font-bold text-darthmouthgreen md:text-3xl lg:text-4xl">Activity Logs</h1>
            <div class="">
                <p class="font-semibold text-darthmouthgreen md:text-lg">{{$admin->admin_codename}}</p>
            </div>
        </div>

        <div class="w-full py-4 rounded-lg shadow-lg">
            <div id="contenttable" class="overflow-auto mt-7">
                <table class="table w-full table-auto">
                    <thead class="border-b-2 border-black">
                        <th class="w-[200px] text-base">Timestamp</th>
                        <th class="w-[50px] text-base">User Type</th>
                        <th class="w-[50px] text-base">User ID</th>
                        <th class="w-[75px] text-base">Name</th>
                        <th class="w-[250px] text-base">Action</th>
                    </thead>
    
                    <tbody>
                        @forelse ($logs as $log)
                            <tr>
                                <td>{{$log->timestamp}}</td>
                                <td>{{$log->user_type}}</td>
                                <td>{{$log->user_id}}</td>
                                <td>{{$log->name}}</td>
                                <td>{{$log->action}}</td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">{{$logs->links()}}</div>
        </div>

    </div>
</section>
@endsection