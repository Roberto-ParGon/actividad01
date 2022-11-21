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
      }}>
      <form style={{width: '25vw'}}>
        <StudentSelector />
        <TeacherSelector />
        <HoursSelector />
        <DeviceSelector 
          values={selectedDevices}
          setValues={setSelectedDevices} />

        <div
          style={{display: 'flex', justifyContent: 'center'}}>
          <MaterialUI.Button variant="contained" disableElevation onClick={onClick}>
            Prestar
          </MaterialUI.Button>
        </div>
      </form>
    </div>
  );
}
