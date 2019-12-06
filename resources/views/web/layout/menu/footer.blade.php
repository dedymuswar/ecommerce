@foreach ($items as $menu_item)
<li> <a class="{{$menu_item->title}}" href="{{$menu_item->link()}}"><i class="fa fa-{{$menu_item->title}}"></i></a></li>
@endforeach