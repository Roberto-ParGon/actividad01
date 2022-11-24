const CreateLoanFeature = () => {
  const [selectedDevices, setSelectedDevices] = React.useState([]);
  const [maestro, setMaestro] = React.useState({});
  const [alumno, setAlumno] = React.useState({});
  const [aula, setAula] = React.useState('');
  const [ee, setEE] = React.useState('');

  const [horas, setHoras] = React.useState({
    inicio: {
      label: '',
      value: '',
    },
    fin: {
      label: '',
      value: '',
    },
  });

  const onClick = (e) => {
    e.preventDefault();
    const date = new Date();
    const fecha = `${date.getFullYear()}-${date.getMonth()}-${date.getDate()}`;

    console.log(document.querySelector('#root'))

    console.log({
      fecha,
      horario_entrada: horas.inicio.label,
      horario_salida: horas.fin.label,
      is_active: true,
      nrc_materia: ee.nrc,
      id_aula: aula.id,
      id_usuario: 1,
      id_profesor: maestro.noPersonal,
      id_alumno: alumno.matricula,
    });
  }

  return (
    <div 
      style={{
        padding: '1rem .5rem',
        boxShadow: 'rgba(99, 99, 99, 0.2) 0px 2px 8px 0px',
        borderRadius: '10px'
      }}>
      <form style={{display: 'flex', flexFlow: 'column', width: '25vw'}}>

        {/* Titulo */}
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
        <HoursSelector horas={horas} setHoras={setHoras}/>

        {/* Nombre del maestro */}
        <TeacherSelector maestro={maestro} setMaestro={setMaestro} />

        {/* Nombre de alumno */}
        <StudentSelector alumno={alumno} setAlumno={setAlumno} />

        {/* Experiencia Educativa */}
        <CoursesSelector ee={ee} setEE={setEE} />
        
        {/* Aula */}
        <ClassroomsSelector aula={aula} setAula={setAula} />

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
