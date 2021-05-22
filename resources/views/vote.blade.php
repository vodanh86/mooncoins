<?php $id = $coin["id"] ?>
<a href="#" onclick="return vote('{{$id}}')" class="btn {{$coin['voted'] == 0 ? 'btn-success' : 'btn-info'}} pill px-4 mt-3 mt-md-0">{{$coin["vote"]}}</a>
