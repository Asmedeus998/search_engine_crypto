@extends('layout.main')

@section('content')


<form action="/update" method="POST" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td><label for="image">Image</label></td>
            <td><input type="file" id="image" name="image"></td>
        </tr>
    </table>
    <button type="submit " class="text-primary">Change Profile picture</button>
</form>
@endsection
