import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';
import $ from 'jquery';

const EditEmployeeForm = ({ employee, onSubmit }) => {
  const [formData, setFormData] = useState({ ...employee });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    console.log('Submitting data:', formData);

    try {
        
      const response = await fetch(`http://127.0.0.1:8000/api/employees/${formData.id}`, {
        method: 'PUT', // hoặc PUT nếu bạn muốn
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(formData)
      });
  
        if (!response.ok) {
        const errorData = await response.json();
        throw new Error(errorData.message || 'Cập nhật nhân viên thất bại');
        }
    
        const result = await response.json();
        console.log('Success:', result);
        alert('llyEmployee updated successfu!');
        setTimeout(() => {
          window.location.href = 'http://127.0.0.1:8000/user/index';
        });

    } catch (error) {
      console.error('Error:', error);
      alert('Failed to update employee');
    }
  };
  

return (
    <form onSubmit={handleSubmit} className="form-horizontal" >
        <div className="form-group">
            <label>First Name</label>
        </div>
        <div className="form-group">
            <label className="col-sm-2 control-label">First Name</label>
            <div className="col-sm-10">
                <input type="text" name="first_name" value={formData.first_name} onChange={handleChange} className="form-control" />
            </div>
        </div>
        
        <div className="hr-line-dashed"></div>
        <div className="form-group">
            <label className="col-sm-2 control-label">Last Name</label>
            <div className="col-sm-10">
                <input type="text" name="last_name" value={formData.last_name} onChange={handleChange} className="form-control" />
            </div>
        </div>
        
        <div className="hr-line-dashed"></div>
        <div className="form-group">
            <label className="col-sm-2 control-label">Email</label>
            <div className="col-sm-10">
                <input type="email" name="email" value={formData.email} onChange={handleChange} className="form-control" />
                <p className="form-control-static">email@example.com</p>
            </div>
        </div>

        <div className="hr-line-dashed"></div>

        <div className="form-group">
            <label className="col-sm-2 control-label">Phone</label>
            <div className="col-sm-10">
                <input type="number" name="phone" value={formData.phone} onChange={handleChange} className="form-control" />
            </div>
        </div>
        
        <div className="hr-line-dashed"></div>
        <div className="form-group">
            <label className="col-lg-2 control-label">Hired Day</label>
            <div className="col-lg-10">
                <input type="date" value={formData.hire_date} onChange={handleChange} className="form-control" name="hire_date" readOnly/>
            </div>
        </div>

        <div className="hr-line-dashed"></div>
        <div className="form-group">
            <label className="col-sm-2 control-label">Status</label>
            <div className="col-sm-10">
                <select name="status" value={formData.status} onChange={handleChange} className="form-control">
                    <option value="1" >Active</option>
                    <option value="2" >Inactive</option>
                </select>
            </div>
        </div>

        <div className="hr-line-dashed"></div>
        <div className="form-group">
            <label className="col-sm-2 control-label">Department</label>
            <div className="col-sm-10">
                <select name="department_id" value={formData.department_id} onChange={handleChange} className="form-control">
                    <option value="1">IT</option>
                    <option value="2">Tài chính</option>
                    <option value="3">Nhân sự</option>
                    <option value="4">Trùm</option>
                </select>
            </div>
        </div>

        <div className="hr-line-dashed"></div>
        <div className="form-group">
            <label className="col-sm-2 control-label">Position</label>
            <div className="col-sm-10">
                <select name="position_id" value={formData.position_id} onChange={handleChange} className="form-control">
                    <option value="1">Nhân viên</option>
                    <option value="2">Tổ trưởng</option>
                    <option value="3">Quản lý</option>
                    <option value="4">Trùm</option>
                </select>
            </div>
        </div>

        <div className="hr-line-dashed"></div>
        <div className="form-group">
            <label className="col-sm-2 control-label">Salary</label>
            <div className="col-sm-10">
                <input type="text" name="salary" value={formData.salary} onChange={handleChange} className="form-control" />
            </div>
        </div>
        <div className="form-group">
            <div className="col-sm-4 col-sm-offset-2">
                <button type="button" onClick={() => window.history.back()} className="btn btn-white">Cancel</button>
                <button type="submit" className="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
);
};


const rootElement = document.getElementById('edit-employee-form');
const employeeData = JSON.parse(rootElement.getAttribute('data-employee'));

const root = ReactDOM.createRoot(rootElement);
root.render(<EditEmployeeForm employee={employeeData} onSubmit={(data) => console.log('Submit data:', data)} />);
// export default EditEmployeeForm;
