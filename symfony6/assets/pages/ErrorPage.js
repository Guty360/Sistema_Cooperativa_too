import React from 'react';
import { useRouteError } from 'react-router-dom';
import '../styles/ErrorPage.css';
export default function ErrorPage() {
  const error = useRouteError();
  console.error(error);

  return (
    <>
      <body>
        <div id='notfound'>
          <div className='notfound'>
            <div className='notfound-404'>
              <h1>Oops!</h1>
              <h2>{`${error.statusText} ${error.message}`}</h2>
            </div>
            <a href='/'>Go TO Homepage</a>
          </div>
        </div>
      </body>
    </>
  );
}
