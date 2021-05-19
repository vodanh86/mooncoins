<footer class="site-footer">
    <div class="container">
    <hr/>

    <div class="row">
        <div class="col-6 col-md-4 col-lg-8 mb-5 mb-lg-0">
        <h3 class="footer-heading mb-4 text-success">Moon Coins</h3>
        <p>Help your coins go to the moon</p>
        </div>
        <div class="col-6 col-md-4 col-lg-4 mb-5 mb-lg-0">
        <h3 class="footer-heading mb-4 text-success">Quick Menu</h3>
        <ul class="list-unstyled">
            <li><a href="/">Homepage</a></li>
            <li><a href="{{url('addCoin')}}">Add coin</a></li>
            <li class="{{ (request()->is('promote')) ? 'active' : '' }}"><a href="{{url('promote')}}">Promote</a></li>
            <li class="{{ (request()->is('newsletter')) ? 'active' : '' }}"><a href="{{url('newsletter')}}">Newsletter</a></li>
        </ul>
        </div>
    </div>
    </div>
</footer>