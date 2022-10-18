import './styles/app.css';
import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';
import HomeComp from './pages/Home/Home';

function App() {
  return (
    <>
      <HomeComp />
    </>
  );
}

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);
