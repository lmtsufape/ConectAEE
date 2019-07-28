<div id="barra-logos" class-"container" style="background:#FFFFFF; margin-top: 1px; height: 200px; padding: 10px 0 10px 0">
    <ul id="logos" style="list-style:none;">
        <li style="margin-right:140px; margin-left:110px; border-right:1px">
            @if(Auth::check() && (Auth::user()->username == 'adelino.lmts' || Auth::user()->username == 'alana.lmts' || Auth::user()->username == 'mateus.lmts' || Auth::user()->username == 'eberson.lmts'))
                <a href="{{ route("home") }}"><img src="{{asset('images/pikachinho.jpeg')}}" style = "margin-left: 8px; margin-top:5px " height="170px" align = "left" ></a>
            @else
                <a href="{{ route("home") }}"><img src="{{asset('images/aee.jpeg')}}" style = "margin-left: 8px; margin-top:5px " height="170px" align = "left" ></a>
            @endif

            <a target="_blank" href="http://lmts.uag.ufrpe.br/"><img src="{{asset('images/lmts3.png')}}" style = "margin-left: 8px; margin-top:65px " height="80" align = "right" ></a>

            <img src="{{asset('images/separador.png')}}" style = "margin-left: 15px; margin-top: 65px" height="70" align = "right" >
            <a target="_blank" href="http://ww3.uag.ufrpe.br/"><img src="{{asset('images/uag.png')}}" style = "margin-left: 10px; margin-top: 65px" height="80" width="70" align = "right" ></a>

            <img src="{{asset('images/separador.png')}}" style = "margin-left: 15px; margin-top: 65px" height="70" align = "right" >
            <a target="_blank" href="http://www.ufrpe.br/"><img src="{{asset('images/ufrpe.png')}}" style = "margin-left: 15px; margin-right: -10px; margin-top: 65px " height="80" width="70" align = "right"></a>
        </li>
    </ul>
</div>
