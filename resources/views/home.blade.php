<x-header />
<main class="container mt-4">
    <div class="my-3 mt-5 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">Links</h6>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <a class="d-block text-gray-dark" href="{{ url('addstudent') }}"> <strong class="text-gray-dark">Add Student</strong></a>
                </div>
            </div>
        </div>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <a class="d-block text-gray-dark" href="{{ url('liststudent') }}"> <strong class="text-gray-dark">View Students</strong></a>
                </div>
            </div>
        </div>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <a class="d-block text-gray-dark" href="{{ url('addmark') }}"> <strong class="text-gray-dark">Add Marks</strong></a>
                </div>
            </div>
        </div>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <a class="d-block text-gray-dark" href="{{ url('listmarks') }}"> <strong class="text-gray-dark">View Marks</strong></a>
                </div>
            </div>
        </div>
    </div>
</main>
<x-footer />
