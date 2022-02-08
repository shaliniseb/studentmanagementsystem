<x-header />

<div class="container bg-white">
    <main>
        <div class="py-5 text-center">
            <h2>Add Marks</h2>
        </div>
        <div class="row g-5">
            <div class="col-md-5 col-lg-6 mx-auto ">
                <h4 class="mb-3">Add Student Marks</h4>
                @if (count($students) > 0)
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif
                    <form class="needs-validation" method="POST" novalidate action="addmark">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="student" class="form-label">Student </label>
                                <select class="form-control" id="student" name="student" required>
                                    <option value="">Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student['id'] }}">{{ $student['name'] }}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">
                                    Please select student.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="term" class="form-label">Term </label>
                                <select class="form-control" id="term" name="term" required>
                                    <option value="">Select</option>
                                    <option value="One">One</option>
                                    <option value="Two">Two</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select term.
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="maths" class="form-label">Mark obtained for maths</label>
                                <input type="number" class="form-control" id="maths" name="maths"
                                    placeholder="Mark obtained for maths" value="" min="0" step="1" required>
                                <div class="invalid-feedback">
                                    Valid mark is required.
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="science" class="form-label">Mark obtained for science</label>
                                <input type="number" class="form-control" id="science" name="science"
                                    placeholder="Mark obtained for science" value="" min="0" step="1" required>
                                <div class="invalid-feedback">
                                    Valid mark is required.
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="history" class="form-label">Mark obtained for history</label>
                                <input type="number" class="form-control" id="history" name="history"
                                    placeholder="Mark obtained for history" value="" min="0" step="1" required>
                                <div class="invalid-feedback">
                                    Valid mark is required.
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <button class="w-50 btn btn-primary btn-lg" type="submit">Save</button>
                    </form>
                @else
                    <p class="bg-danger text-white p-1">No students found. Please add student to create marklist.</p>
                    <a href="{{ url('addstudent') }}">Add Student</a>
                @endempty
        </div>
    </div>
</main>
</div>
<x-footer />
