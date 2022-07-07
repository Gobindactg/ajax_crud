<h1 class="text-center">Total Student List</h1>

<table>
    <tr>

        <th>Name</th>
        <th>Gender</th>

    </tr>
    @foreach($student as $studensts)
    <tr>

        <td>{{$studensts->Full_Name}}</td>
        <td>{{$studensts->Gender}}</td>

    </tr>
    @endforeach
</table>