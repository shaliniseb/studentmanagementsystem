<x-header />
<div class="container bg-white">
    <main>
        <div class="py-5 text-center">
            <h2>Edit Marks</h2>
        </div>
        <div class="row g-5">
            <div class="col-md-5 col-lg-6 mx-auto ">
                <h4 class="mb-3">Edit Student Marks</h4>
                @if (count($studentMarkData) > 0)
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif
                    <form class="needs-validation" method="POST" novalidate action="{{ route('mark.edit') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="student" class="form-label">Student </label>
                                <input type="hidden" id="markListId" name="markListId"
                                    value="{{ $studentMarkData[0]->id }}">
                                <select class="form-control" id="student" name="student" required>
                                    <option value="">Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student['id'] }}" @if ($student['id'] == $studentMarkData[0]->student_id)
                                            selected
                                    @endif
                                    >{{ $student['name'] }}</option>
                @endforeach
                </select>
                <div class="invalid-feedback">
                    Please select student.
                </div>
            </div>
            <div class="col-12">
                <label for="term" class="form-label">Term </label>
                <select class="form-control" id="term" name="term" required>
                    <option value="" selected>Select</option>
                    <option value="One" @if ($studentMarkData[0]->term == 'One')
                        selected
                        @endif
                        >One</option>
                    <option value="Two" @if ($studentMarkData[0]->term == 'Two')
                        selected
                        @endif
                        >Two</option>
                </select>
                <div class="invalid-feedback">
                    Please select term.
                </div>
            </div>
            <div class="col-sm-12">
                <label for="maths" class="form-label">Mark obtained for maths</label>
                <input type="number" class="form-control" id="maths" name="maths"
                    placeholder="Mark obtained for maths" value="{{ $studentMarkData[0]->maths_mark }}" min="0"
                    step="1" required>
                <div class="invalid-feedback">
                    Valid mark is required.
                </div>
            </div>
            <div class="col-sm-12">
                <label for="science" class="form-label">Mark obtained for science</label>
                <input type="number" class="form-control" id="science" name="science"
                    placeholder="Mark obtained for science" value="{{ $studentMarkData[0]->science_mark }}" min="0"
                    step="1" required>
                <div class="invalid-feedback">
                    Valid mark is required.
                </div>
            </div>
            <div class="col-sm-12">
                <label for="history" class="form-label">Mark obtained for history</label>
                <input type="number" class="form-control" id="history" name="history"
                    placeholder="Mark obtained for history" value="{{ $studentMarkData[0]->history_mark }}" min="0"
                    step="1" required>
                <div class="invalid-feedback">
                    Valid mark is required.
                </div>
            </div>
        </div>
        <hr class="my-4">
        <button class="w-50 btn btn-primary btn-lg" type="submit">Save</button>
        </form>
    @else
        <p class="bg-danger text-white p-1">No Data Found</p>
        <a href="{{ url('addmark') }}">Add Mark</a>
    @endempty
</main>
</div>
<x-footer />
