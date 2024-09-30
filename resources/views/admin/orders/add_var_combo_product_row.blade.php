        <tr>
            <td><img src="/uploads/product/thumb-small-image/{{$variation->thumb_image}}" height="50" width="50"/></td>
            <td>{{ $variation->name }}</td>
            <input type="hidden" class="form-control product_id" name="product_id[]" value="{{$pr_id}}" required/>
            <td>
                <a href="#" class="remove btn btn-sm btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
            </td>
        </tr>