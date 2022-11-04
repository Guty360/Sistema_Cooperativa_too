import React, { useState, Component } from 'react';
import {
  MapContainer,
  TileLayer,
  useMapEvents,
  Marker,
  Popup,
} from 'react-leaflet';
import 'leaflet/dist/leaflet.css';
import IconLocation from './IconLocation';

// class Map extends Component {
//   state = { map: null };

//   componentDidUpdate(prevProps, prevState) {
//     const { map } = this.state;
//     if (prevState.map !== map && map) {
//       map.on('click', function (e) {
//         alert('Lat, Lon : ' + e.latlng.lat + ', ' + e.latlng.lng);
//       });
//     }
//   }

//   render() {
//     const DEFAULT_LATITUDE = 32.313268;
//     const DEFAULT_LONGITUDE = 35.022895;
//     const latitude = this.props.coords
//       ? this.props.coords.latitude
//       : DEFAULT_LATITUDE;
//     const longitude = this.props.coords
//       ? this.props.coords.latitude
//       : DEFAULT_LONGITUDE;

//     return (
//       <MapContainer
//         className='leaflet-map'
//         center={[latitude, longitude]}
//         zoom={17}
//         scrollWheelZoom={true}
//         style={{ width: '100wh', height: '100vh' }}
//         whenCreated={(map) => this.setState({ map })}
//       >
//         <TileLayer
//           attribution='&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
//           url='https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
//         />
//         <Marker position={[latitude, longitude]} icon={IconLocation}>
//           <Popup>Here you are ^_^</Popup>
//         </Marker>
//       </MapContainer>
//     );
//   }
// }

function Map() {
  const handleClick = (e) => {
    const { lat, lng } = e.latlng;
    console.log(lat, lng);
  };
  function LocationMarker() {
    const [position, setPosition] = useState(null);
    const map = useMapEvents({
      click() {
        map.locate();
      },
      locationfound(e) {
        setPosition(e.latlng);
        map.flyTo(e.latlng, map.getZoom());
      },
    });

    return position === null ? null : (
      <Marker position={position} icon={IconLocation}>
        <Popup>{`Estas aquí ${position}`}</Popup>
      </Marker>
    );
  }

  return (
    <MapContainer
      center={{ lat: 13.7157343, lng: -89.2022656 }}
      zoom={10}
      style={{ width: '60vw', height: '100vh' }}
      onClick={handleClick}
    >
      <TileLayer
        attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        url='https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
      />
      <LocationMarker />
    </MapContainer>
  );
}

export default Map;
