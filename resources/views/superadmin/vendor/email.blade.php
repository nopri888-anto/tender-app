<h2>{{$email['title']}}</h2>
<p>Username : {{$email['username']}}</p>
<p>Password : {{$email['password']}}</p>
<p>Status   :  @if($email['status'] == 1)
               Sudah Aktif
                @elseif($email['status'] == 2)
                Pending
                @else
                Blok
                @endif
</p>
<p>Remark : {{$email['remark']}}</p>

<p>Mohon ganti password setelah login!</p>