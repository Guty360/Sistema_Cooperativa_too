import React from 'react';
import ReactDOM from 'react-dom/client';
//Vistas
import HomeComp from './pages/Home/Home';
import Login from './pages/Login/Login';
import Forgot from './pages/Login/Forgot';
//Router
import { BrowserRouter, Routes, Route } from 'react-router-dom';
//Styles
import './styles/app.css';
import './bootstrap';
import Ingreso from './pages/Ingreso-Asociado/Ingreso';
import Registrar from './pages/Registrar/Registrar';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path='/' element={<HomeComp />}></Route>
        <Route path='/login' element={<Login />}></Route>
        <Route path='/forgot' element={<Forgot />}></Route>
        <Route path='/ingreso-asociado' element={<Ingreso />}></Route>
        <Route path='/registro' element={<Registrar />}></Route>
      </Routes>
    </BrowserRouter>
  );
}

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);
