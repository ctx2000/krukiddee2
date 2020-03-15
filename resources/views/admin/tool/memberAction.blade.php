<button id="#" class="btn btn-info btn-sm d-inline mr-2">
    <li class="fas fa-pencil-alt text-white"></li>
</button>

<form id="frmDel" method="POST" class="d-inline" onsubmit="return confirm('แน่ใจว่าต้องการลบข้อมูล?')">
    @csrf
    @method('DELETE')
    <button  class="btn btn-danger btn-sm">
                    <li class="fa fa-trash text-white"></li>
    </button>
</form>
