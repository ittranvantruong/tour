<tr class="item-{{$item->id}}">
    <td>@if($item->id != 1)<input type="checkbox" class="check-list" name="id[]" value="{{$item->id}}">@endif
    </td>
    <td>{{$item->title}}</td>
    <td>{{config('custom.tour.group')[$item->group]['title']}}</td>
    <td>{!! status($item->status) !!}</td>
    <td>{{$item->sort}}</td>
    <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button type="button" class="open-modal edit-load btn btn-sm btn-warning" data-modal="#modalCategory"
                data-url="{{ route('admin.tour.place.edit', $item->id) }}">
                <i class="fas fa-edit"></i>
            </button>
            @if($item->id != 1)
            <button type="button" class="delete btn btn-sm btn-danger"
                data-action="{{ route('admin.tour.place.delete', $item->id) }}">
                <i class="fas fa-trash"></i>
            </button>
            @endif
        </div>
    </td>
</tr>