<ul class="dropdown-menu" style="display:block;position:relative;width:100%;">
       @foreach($data as $row)
        <li><a class="dropdown-item" href="#">{{$row->full_name}} </a></li>
    @endforeach
</ul>


{{--    $output = '<ul class="dropdown-menu" style="display:block;position:relative;width:100%;">';--}}
{{--            foreach ($data as $row) {--}}
{{--                $output .= '--}}
{{--                <li><a class="dropdown-item" href="#">' . $row->full_name . '</a></li>--}}
{{--                ';--}}
{{--            }--}}
{{--            $output .= '</ul>';--}}
{{--            echo $output;--}}
{{--        }--}}
