import './styles/app.css';
import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';
import HomeComp from './pages/Home/Home';
import { BrowserRouter, Routes, Route, RoutesProps } from 'react-router-dom';
import Login from './pages/Login/Login';
import Forgot from './pages/Login/Forgot';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path='/' element={<HomeComp />}></Route>
        <Route path='/login' element={<Login />}></Route>
        <Route path='/forgot' element={<Forgot />}></Route>
      </Routes>
    </BrowserRouter>
  );
}

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);
