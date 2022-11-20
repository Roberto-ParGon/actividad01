const CreateLoanFeature = () => {
  const [selectedDevices, setSelectedDevices] = React.useState([]);

  const onClick = (e) => {
    e.preventDefault();
    console.log(selectedDevices);
  }

  return (
    <div>
      <form>
        <DeviceSelector 
          values={selectedDevices}
          setValues={setSelectedDevices} />

        <MaterialUI.Button variant="contained" disableElevation onClick={onClick}>
          Disable elevation
        </MaterialUI.Button>
      </form>
    </div>
  );
}
