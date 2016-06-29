@extends('layouts/master')
@section('title', 'User List')
@section('content')

<table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Username </th>
        <th> Level </th>
        <th> Delete </th>
        <th> Edit </th>
      </tr>
    </thead>
    <tbody>
    <?php $stt = 0 ?>
    @foreach($user as $item)
      <tr>
        <td>{!! $item['id']!!}</td>
        <td>{!! $item["username"] !!}</td>
        <td> 
            @if($item["id"] == 1)
                Supperadmin
            @elseif ($item["level"]==1)
                Admin
            @else
                Member
            @endif
        </td>
        <td> <a onclick="xacnhanxoa()" href="{!! URL::route('admin.user.delete', $item['id']) !!}"> Delete </a></td>
        <td> <a href="{!! URL::route('admin.user.getEdit', $item['id']) !!}"> Edit </a> </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection