        <tr>
            <td><img src="/uploads/product/thumb-small-image/{{$variation->thumb_image}}" height="50" width="50"/></td>
            <td>{{ $variation->name }}</td>
            <td>
                <input type="hidden" class="form-control" id="product_id" name="product_id[]" value="{{$pr_id}}" required/>
            </td>
            <td>
                <a href="#" class="remove btn btn-sm btn-danger"> Delete </a>
            </td>
        </tr>