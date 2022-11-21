const CreateLoanFeature = () => {
  const [selectedDevices, setSelectedDevices] = React.useState([]);
  const [error, setError] = React.useState('');

  const onClick = (e) => {
    e.preventDefault();
    console.log(selectedDevices);
  }

  return (
    <div 
      style={{
        padding: '1rem .5rem',
        boxShadow: 'rgba(99, 99, 99, 0.2) 0px 2px 8px 0px',
        borderRadius: '10px'
      }}>
      <form style={{display: 'flex', flexFlow: 'column', width: '25vw'}}>

        <div
          style={{
            display: 'flex', 
            justifyContent: 'center',
            fontSize: '20px',
            padding: '0 0 .3rem 0',
          }}>
          Crear Prestamo
        </div>

        {/* Horas */}
        <HoursSelector />

        {/* Nombre del maestro */}
        <TeacherSelector />

        {/* Nombre de alumno */}
        <StudentSelector />

        {/* Experiencia Educativa */}
        <Input 
          placeholder="Experiencia Educativa" 
          autocomplete="off"
          styles={{
            marginBottom: '0.6rem',
          }} />
        
        {/* Aula */}
        <Input 
          placeholder="Aula" 
          autocomplete="off"
          styles={{
            marginBottom: '0.6rem',
          }} />

        {/* Dispositivos */}
        <DeviceSelector 
          values={selectedDevices}
          setValues={setSelectedDevices} />

        <div
          style={{
            display: 'flex', 
            justifyContent: 'center',
            marginTop: '.2rem',
          }}>
          <MaterialUI.Button variant="contained" disableElevation onClick={onClick}>
            Prestar
          </MaterialUI.Button>
        </div>
      </form>
    </div>
  );
}
