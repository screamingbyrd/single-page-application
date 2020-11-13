import React, { useState, useEffect } from 'react';

function ContactButton() {
  const [count, setCount] = useState(0);

  // Équivalent à componentDidMount plus componentDidUpdate :
  useEffect(() => {
    // Mettre à jour le titre du document en utilisant l'API du navigateur
    document.title = `Vous avez cliqué ${count} fois`;
  });

  return (
    <div>
      <p>Vous avez cliqué {count} fois</p>
      <a onClick={() => setCount(count + 1)} href="#" className="btn btn-default">Contact Now</a>
    </div>
  );
}
 
export default ContactButton;