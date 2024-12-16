<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Computer;
use App\Models\issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    //
    public function index()
    {
        // Sử dụng paginate thay vì all()
        $issues = issue::with('Computer')->paginate(5); // Lấy 5 bản ghi mỗi trang
        return view('Issues.index', compact('issues'));
    }
    public function create()
    {
        $computers = Computer::all(); // Lấy danh sách sinh viên để chọn
        $issues = issue::all();
        return view('Issues.create', compact('computers', 'issue'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|max:100',
            'urgency' => 'required',
            'status' => 'required',
        ]);

        issue::create($request->all());

        return redirect()->route('Issues.index')->with('success', 'Thêm vấn đề thành công');
    }
    public function edit($id)
    {
        $issues = issue::findOrFail($id);
        $computers = Computer::all();
        return view('Issues.edit', compact('issues', 'computers'));
    }
    public function update(Request $request, $id) {
        // Kiểm tra dữ liệu đầu vào (validation)
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ]);
    
        // Tìm đối tượng Thesis cần cập nhật
        $issue = issue::find($id);
        
        // Cập nhật thông tin
        $issue->update($request->all());
    
        // Điều hướng trở lại trang index với thông báo thành công
        return redirect()->route('Issues.index')->with('success', 'Cập nhập báo cáo thành công');
    }

    public function destroy($id)
    {
        $issue = issue::findOrFail($id);
        $issue->delete();

        return redirect()->route('Issues.index')->with('success', 'Báo cáo đã được xóa');
    }
    //
}
