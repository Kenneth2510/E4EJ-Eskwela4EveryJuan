@extends('layouts.admin_layout')

@section('content')
<section class="w-full h-auto text-black md:w-3/4 md:h-screen lg:w-10/12">
    <div class="h-full px-2 py-4 pt-12 rounded-lg shadow-lg md:overflow-auto md:pt-0">
        <div class="flex items-center justify-between p-3 border-b-2 border-gray-300 md:py-8">
            <h1 class="text-2xl font-bold text-darthmouthgreen md:text-3xl lg:text-4xl">Admin Management</h1>
            <div class="">
                <p class="font-semibold text-darthmouthgreen md:text-lg">{{$admin->admin_codename}}</p>
            </div>
        </div>

        <div class="w-full py-4 rounded-lg shadow-lg">

            <div class="flex flex-col items-center space-y-2 lg:space-y-0 lg:flex-row lg:space-x-2">
                @if($admin->role === 'SUPER_ADMIN')
                <a href="/admin/admins/add_admin" class="btn btn-primary">Add
                    New</a>
                @endif
                <form action="{{ url('/admin/admins') }}" method="GET" class="flex items-center">

                    <div class="flex items-center space-x-2">
                        <select name="searchBy" class="w-1/3 input input-bordered input-primary">
                            <option value="">Search By</option>
                            <option value="admin_id">Admin ID</option>
                            <option value="admin_username">Admin Username</option>
                            <option value="admin_codename">Codename</option>
                            <option value="role">Role</option>
                        </select>

                        <input type="text" name="searchVal" class="w-1/3 input input-bordered input-primary"
                            placeholder="Type to search">

                        <button class="w-1/3 btn btn-primary lg:w-auto" type="submit">Search</button>
                    </div>
                </form>


            </div>

            <div id="contenttable" class="overflow-auto mt-7">
                <table class="table w-full table-auto">
                    <thead class="border-b-2 border-black">
                        <th class="w-[150px] text-base">Admin ID</th>
                        <th class="w-[150px] text-base">Admin Username</th>
                        <th class="w-[150px] text-base">Codename</th>
                        <th class="w-[150px] text-base">Role</th>
                        <th class="w-[150px] text-base"></th>
                    </thead>
                    <tbody id="AD_learners" class="">
                        @forelse ($adminData as $admin)
                        <tr>
                            <td>{{ $admin->admin_id }}</td>
                            <td>{{ $admin->admin_username }}</td>
                            <td class="py-1">{{ $admin->admin_codename }}</td>
                            <td class="py-1">{{ $admin->role }}</td>
                            <td>
                                @if($admin->role !== 'IT_DEPT' || $admin->role !== 'SUPER_ADMIN')
                                <a href="/admin/view_admin/{{ $admin->admin_id }}" class="btn btn-primary">View</a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="py-1" colspan="7">No admin found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">{{ $adminData->links() }}</div>
            </div>
        </div>


    </div>
</section>
@endsection