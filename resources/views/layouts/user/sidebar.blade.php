<div class="card-header" style="background: black;">
    <ul class="row my-2 px-0">
        <li class="col-3 text-center"><a class=" {{Request::is('account')? 'active' : 'text-white '}}"
                                         href="/account">Account</a></li>
        <li class="col-3 text-center"><a class=" {{Request::is('password')? 'active' : 'text-white '}}"
                                         href="/password">Password</a></li>
        <li class="col-3 text-center"><a class=" {{Request::is('notification')? 'active' : 'text-white '}}"
                                         href="/notification">Notification</a></li>
        <li class="col-3 text-center"><a class=" {{Request::is('order')? 'active' : 'text-white '}}"
                                         href="/order">Order</a>
        </li>
    </ul>
</div>
