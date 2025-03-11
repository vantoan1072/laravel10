import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';
import SearchForm from '../components/SearchForm.jsx';
  

// const root = ReactDOM.createRoot(document.getElementById('search-form'));
// root.render(<SearchForm />);

const rootElement = document.getElementById('search-form');
if (rootElement) {
  const root = ReactDOM.createRoot(rootElement);
  root.render(<SearchForm />);
}