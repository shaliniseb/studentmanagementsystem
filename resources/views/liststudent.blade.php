<x-header />
<div class="container bg-white mt-5">
    <main>
        <div class="py-5 text-center">
            <h2>Students List</h2>
        </div>
        @if (count($students) > 0)

            <table id="students" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Reporting Teacher</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $student['name'] }}</td>
                            <td>{{ $student['age'] }}</td>
                            <td>{{ $student['gender'] }}</td>
                            <td>{{ $student['teacher'] }}</td>
                            <td><a href=" {{ url('editstudent/' . $student['id']) }}">Edit</a> / <a role="button"
                                    onclick="deleteStudent({{ $student['id'] }})"> Delete</a></td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                    </tfoot>
            </table>
        @else
            <p class="bg-danger text-white p-1">No Students Found</p>
            <a href="{{ url('addstudent') }}">Add Student</a>
        @endempty
</main>
</div>
<script>
    $(document).ready(function() {
        $('#students').DataTable();
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Delete student entry from database
    let deleteStudent = (studentId) => {
        $.ajax({
            type: 'POST',
            url: "{{ route('deleteStudent.post') }}",
            data: {
                studentId: studentId
            },
            success: function(data) {
                alert(data.success);
                location.reload();
            }
        });
    }
</script>
<x-footer />
