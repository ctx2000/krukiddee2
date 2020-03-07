<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h5>asdasd</h5>
    <form action=" {{route('donation.store')}} " method="POST" enctype="multipart/form-data">

        @csrf


        {{ Form::number('price', null, ['class'=>'form-control','min'=>0]) }}
        <label for="description">รายละเอียดของนักเรียน</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        <input type="file" class="custom-file-input" id="picture" name="picture">
        <label class="custom-file-label" for="validatedCustomFile">เลือกภาพนักเรียน</label>
        <input type="hidden" name="student_id" value="{{$stu->id}}">

        <button type="submit" class="btn btn-primary mt-3">บันทึก</button>
    </form>

</body>

</html>
