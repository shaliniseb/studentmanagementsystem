<x-header />
<div class="container bg-white mt-5">
    <main>
        <div class="py-5 text-center">
            <h2>Students Mark List</h2>
        </div>
        @if (count($marks) > 0)
            <table id="marks" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Maths</th>
                        <th>Science</th>
                        <th>History</th>
                        <th>Term</th>
                        <th>Total Marks</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($marks as $mark)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $mark['student'] }}</td>
                            <td>{{ $mark['maths_mark'] }}</td>
                            <td>{{ $mark['science_mark'] }}</td>
                            <td>{{ $mark['history_mark'] }}</td>
                            <td>{{ $mark['term'] }}</td>
                            <td>{{ $mark['history_mark'] + $mark['maths_mark'] + $mark['science_mark'] }}</td>
                            <td>{{ date('M j, Y h:m A', strtotime($mark['created_at'])) }}</td>
                            <td><a href=" {{ url('editmark/' . $mark['id']) }}">Edit</a> / <a role="button"
                                    onclick="deleteMark({{ $mark['id'] }})"> Delete</a></td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                    </tfoot>
            </table>
        @else
            <p class="bg-danger text-white p-1">No Mark list found</p>
            <a href="{{ url('addmark') }}">Add Mark</a>
        @endempty
</main>
</div>
<script>
    // initialse datatable
    $(document).ready(function() {
        $('#marks').DataTable();
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Function for deleting mark
    let deleteMark = (markId) => {
        $.ajax({
            type: 'POST',
            url: "{{ route('deleteMark.post') }}",
            data: {
                markListId: markId
            },
            success: function(data) {
                alert(data.success);
                location.reload();
            }
        });
    }
</script>
<x-footer />
