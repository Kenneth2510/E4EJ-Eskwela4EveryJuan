@extends('layouts.admin_layout')

@section('content')
<section class="w-full h-auto text-black md:h-screen lg:w-10/12">
    <div class="h-full px-2 py-4 pt-12 rounded-lg shadow-lg md:overflow-auto md:pt-6">
        <div class="flex items-center justify-between p-3">
            <h1 class="text-2xl font-bold text-darthmouthgreen md:text-3xl lg:text-4xl">Performance Overview</h1>
            <div class="">
                <p class="font-semibold text-darthmouthgreen md:text-lg">{{$admin->admin_codename}}</p>
            </div>
        </div>

        <div class="pt-10">
            <div class="mb-5">
                <a href="/admin/performance" class="">
                    <i class="text-2xl md:text-3xl fa-solid fa-arrow-left" style="color: #000000;"></i>
                </a>
            </div>
            <h1 class="mx-5 text-2xl font-semibold">Learner Overview</h1>
            <hr class="my-6 border-t-2 border-gray-300">
        </div>

        <div class="w-full py-4 rounded-lg shadow-lg">
            <div class="flex flex-col items-center space-y-2 lg:space-y-0 lg:flex-row">
                <form action="{{ url('/admin/performance/learners') }}" method="GET"
                    class="flex flex-col space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                    <div class="flex items-center space-x-2">
                        <label for="filterDate" class="text-lg sr-only">Filter by Date</label>
                        <input type="date" name="filterDate"
                            class="w-1/3 input input-bordered input-primary">

                        <label for="filterStatus" class="text-lg sr-only">Filter by Status</label>
                        <select name="filterStatus" id="filterStatus"
                            class="w-1/3 input input-bordered input-primary">
                            <option value="">Select Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>

                        <button
                            class="w-1/3 btn btn-primary"
                            type="submit">Filter</button>
                    </div>


                    <div class="flex items-center space-x-3">
                        <select name="searchBy" class="w-1/3 input input-bordered input-primary">
                            <option value="">Search By</option>
                            <option value="learner_id">Learner ID</option>
                            <option value="name">Name</option>
                            <option value="learner_email">Email</option>
                            <option value="learner_contactno">Contact No.</option>
                            <option value="business_name">Business Name</option>
                        </select>

                        <input type="text" name="searchVal"
                            class="w-1/3 input input-bordered input-primary"
                            placeholder="Type to search">

                        <button
                            class="w-1/3 btn btn-primary">Search</button>
                    </div>
                </form>


            </div>


            <div id="contenttable" class="overflow-auto mt-7">
                <table class="table w-full text-left border-b border-black table-auto">
                    <thead>
                        <th class="w-[150px]">Learner ID</th>
                        <th class="w-[150px]">Name</th>
                        <th class="w-[150px]">Contact Info</th>
                        <th class="w-[150px]">Business Name</th>
                        <th class="w-[150px]">Date Registered</th>
                        <th class="w-[150px]">Status</th>
                        <th class="w-[150px]"></th>
                    </thead>
                    <tbody id="AD_learners" class="">
                        @forelse ($learners as $learner)
                        <tr>
                            <td>{{ $learner->learner_id }}</td>
                            <td>{{ $learner->learner_fname }} {{ $learner->learner_lname }}</td>
                            <td class="py-1 text-base">{{ $learner->learner_email }}<br>{{ $learner->learner_contactno
                                }}</td>
                            <td class="py-1 text-base">{{ $learner->business_name }}</td>
                            <td class="py-1 text-base">{{ $learner->created_at }}</td>
                            <td class="py-1 text-base">{{ $learner->status }}</td>
                            <td>
                                <a href="/admin/performance/learners/view/{{ $learner->learner_id }}"
                                    class="btn btn-primary">View</a>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="py-1 text-base" colspan="7">No learners found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">{{ $learners->links() }}</div>
            </div>
        </div>
    </div>
</section>
@endsection