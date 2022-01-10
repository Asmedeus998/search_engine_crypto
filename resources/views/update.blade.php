@extends('layout.main')

@section('content')

{{-- {{dd(Auth::user())}} --}}
<form action="/update" method="POST" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            {{-- <td><input type="hidden" id="id" name="id" value="{{(Auth::user()->id)}}"></td> --}}
            <td><label for="image">Image</label></td>
            <td><input type="file" id="image" name="image"></td>
        </tr>
    </table>
    <button type="submit " class="text-primary">Change Profile picture</button>
</form>
@endsection
