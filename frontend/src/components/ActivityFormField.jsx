import React from 'react';

function ActivityFormField({ field, value, setNewActivityCallback, validDataList }) {

  const fieldCapitalized = field.charAt(0).toUpperCase() + field.slice(1);

  return (
    <>
      <div className="form-group row">
        <label htmlFor={field} className="col-sm-2 col-form-label">{fieldCapitalized}</label>
        <div className="col-sm-4">
          <select id={field} className="form-control" value={value}
            onChange={event => setNewActivityCallback(old => ({ ...old, [field]: event.target.value }))}>
            {validDataList.map(d =>
              <option value={d} key={d}>{d}</option>
            )}
          </select>
        </div>
      </div>
    </>
  );
}

export default ActivityFormField;