import React from 'react';
import { Typography, Box } from '@mui/material';
import { Error } from '@mui/icons-material';
import '../styles/components/Alert.css';
function AlertComp({ text }) {
  return (
    <Box className='container-alert'>
      <Error fontSize='small' sx={{ color: 'red', mr: 1 }} />
      <Typography variant='subtitle2' color='red'>
        {text}
      </Typography>
    </Box>
  );
}

export default AlertComp;
