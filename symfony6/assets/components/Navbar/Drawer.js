import React, { useState } from 'react';
import {
  Drawer,
  IconButton,
  List,
  ListItemButton,
  ListItemIcon,
  ListItemText,
} from '@mui/material';
import { Menu } from '@mui/icons-material';
import { navItems } from './Navbar.js';

//Pinta el menu desplegable
const DrawerComp = () => {
  const [openDrawer, setOpenDrawer] = useState(false);
  const newNavItems = navItems.concat(['Login', 'Registrarse']);
  return (
    <>
      <Drawer
        sx={{ background: '#fff5ed' }}
        open={openDrawer}
        onClose={() => setOpenDrawer(false)}
      >
        <List sx={{ background: '#fff5ed', height: '100%' }}>
          {newNavItems.map((item, index) => (
            <ListItemButton onClick={() => setOpenDrawer(false)} key={index}>
              <ListItemIcon>
                <ListItemText>{item}</ListItemText>
              </ListItemIcon>
            </ListItemButton>
          ))}
        </List>
      </Drawer>
      <IconButton
        sx={{ color: '#16382c', marginTop: '40px', marginLeft: 'auto' }}
        onClick={() => setOpenDrawer(!openDrawer)}
      >
        <Menu />
      </IconButton>
    </>
  );
};

export default DrawerComp;
