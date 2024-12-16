<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
crossorigin="anonymous">
<title>Thêm</title>
</head>
<body>


    <h1 style="margin: 50px 50px">Thêm báo cáo</h1>
    <form action="{{ route('Issues.store') }}" method="POST" style="margin: 50px 50px">
        @csrf
        <div class="mb-3">
            <label for="computer_id" class="form-label">Máy tính</label>
            <select class="form-control" id="computer_id" name="computer_id" required>
                @foreach($computers as $computer)
                    <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="reported_by" class="form-label">Người báo cáo</label>
            <input type="text" class="form-control" id="reported_by" name="reported_by" required>
        </div>
        <div class="mb-3">
            <label for="reported_date" class="form-label">Thời gian báo cáo</label>
            <input type="date" class="form-control" id="reported_date" name="reported_date" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Chi tiết vấn đề</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="urgency" class="form-label">Mức độ</label>
            <select class="form-control" id="urgency" name="urgency" required>
                    <option value="{{ $issues->urgency }}">{{ "Low" }}</option>
                    <option value="{{ $issues->urgency }}">{{ "Medium" }}</option>
                    <option value="{{ $issues->urgency }}">{{ "High" }}</option>
            </select></div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select class="form-control" id="status" name="status" required>
                    <option >{{ "open" }}</option>
                    <option >{{ "in progress" }}</option>
                    <option >{{ "resolved" }}</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

</body>