import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';

const SearchForm = () => {
  const [query, setQuery] = useState('');
  const [results, setResults] = useState([]); // Lưu kết quả tìm kiếm
  const [notFound, setNotFound] = useState(false); // Kiểm tra có dữ liệu không

  const handleChange = (e) => {
    setQuery(e.target.value);
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (query.trim() === '') {
      alert('Vui lòng nhập từ khóa tìm kiếm.');
      return;
    }

    try {
      const response = await fetch(`http://127.0.0.1:8000/api/employees/search?query=${query}`);
      if (!response.ok) throw new Error('Lỗi khi tìm kiếm');

      const data = await response.json();
      setResults(data); // Lưu dữ liệu vào state
      setNotFound(data.length === 0); // Nếu rỗng, báo không tìm thấy
    } catch (error) {
      console.error('Lỗi:', error.message);
    }
  };

  return (
    <div>
      <form onSubmit={handleSubmit} className="form-horizontal">
        <div className="input-group">
          <input
            type="text"
            className="form-control input-sm"
            placeholder="Tìm kiếm"
            value={query}
            onChange={handleChange}
          />
          <button className="btn btn-sm btn-primary" type="submit">
            Tìm kiếm
          </button>
        </div>
      </form>

      <div className="search-results">
        {notFound ? (
          <p className="alert alert-warning">Không tìm thấy kết quả nào.</p>
        ) : (
          <ul className="list-group">
            {results.map((employee) => (
              <li key={employee.id} className="list-group-item">
                {employee.first_name} {employee.last_name} - {employee.email}
              </li>
            ))}
          </ul>
        )}
      </div>
      {error && <p style={{ color: 'red' }}>{error}</p>}

<table className="table">
  <thead>
    <tr>
      <th>Họ Tên</th>
      <th>Email</th>
      <th>SĐT</th>
      <th>Chức vụ</th>
      <th>Trạng thái</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    {results.map((employee) => (
      <tr key={employee.id}>
        <td>{employee.name}</td>
        <td>{employee.email}</td>
        <td>{employee.phone}</td>
        <td>{employee.position}</td>
        <td>
          <input type="checkbox" checked={employee.status} readOnly />
        </td>
        <td>
          <button className="btn btn-success btn-sm">Sửa</button>
          <button className="btn btn-danger btn-sm">Xóa</button>
        </td>
      </tr>
    ))}
  </tbody>
</table>

    </div>
  );
};

// Gắn vào div#search-form trong Blade
// const rootElement = document.getElementById('search-form');
// if (rootElement) {
//   const root = ReactDOM.createRoot(rootElement);
//   root.render(<SearchForm />);
// }

export default SearchForm;