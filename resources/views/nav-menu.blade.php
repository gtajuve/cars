<nav>
    <ul class="nav-menu">
        <li class="nav-item {{Request::path() == 'brands' ? 'active' : ''}}"><a  class="nav-link" href="{{url('brands')}}">Brands</a></li>
        <li class="nav-item {{Request::path() == 'models' ? 'active' : ''}}"><a  class="nav-link" href="{{url('models')}}">Models</a></li>
        <li class="nav-item {{Request::path() == 'engines' ? 'active' : ''}}"><a  class="nav-link" href="{{url('engines')}}">Engines</a></li>
        <li class="nav-item {{Request::path() == 'bodyworks' ? 'active' : ''}}"><a  class="nav-link" href="{{url('bodyworks')}}">Bodyworks</a></li>
        <li class="nav-item {{Request::path() == 'cars' ? 'active' : ''}}"><a  class="nav-link" href="{{url('cars')}}">Cars</a></li>
        <li class="nav-item {{Request::path() =='search' ? 'active' : ''}}"><a href="{{url('search')}}">Search</a></li>
    </ul>
</nav>