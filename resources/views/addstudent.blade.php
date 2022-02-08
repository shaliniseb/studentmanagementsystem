<x-header />

<div class="container bg-white">
    <main>
        <div class="py-5 text-center">
            <h2 >Add Student</h2>
        </div>
        <div class="row g-5">
            <div class="col-md-5 col-lg-6 mx-auto ">
                <h4 class="mb-3">Student Details</h4>
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif
                <form class="needs-validation" method="POST" novalidate action="addstudent">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter your name" value="" required>
                            <div class="invalid-feedback">
                                Valid name is required.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="age" class="form-label">Age</label>
                            <div class="input-group has-validation">
                                <input type="number" class="form-control" min="1" step="1" id="age" name="age"
                                    placeholder="Enter your age" required>
                                <div class="invalid-feedback">
                                    Your age is required.
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="gender" class="form-label">Gender </label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select gender.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="teacher" class="form-label">Teacher </label>
                            <select class="form-control" id="teacher" name="teacher" required>
                                <option value="">Select Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher['id'] }}">{{ $teacher['name'] }}</option>
                                @endforeach

                            </select>
                            <div class="invalid-feedback">
                                Please select teacher.
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-50 btn btn-primary btn-lg" type="submit">Save</button>
                </form>
            </div>
        </div>
    </main>
</div>
<x-footer />
