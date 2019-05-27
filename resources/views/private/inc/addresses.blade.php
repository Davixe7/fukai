<ul class="address-list">
    <div class="title-address">mis direcciones</div>
    @foreach($aUser->userAddresses()->orderby('id', 'desc')->get() as $aAddress)
        <li>
            <span>{{ $aAddress->address}}</span>
            <a href="#" data-url="{{ route('user.address.delete',$aAddress->id) }}" class="address-del ctl-delete-address">x</a>
        </li>
    @endforeach
</ul>