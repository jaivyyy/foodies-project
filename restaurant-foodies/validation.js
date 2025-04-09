const validation = new JustValidate("#signup");

// Toon bericht als een veld niet ingevuld is
validation
  .addField("#name", [
    {
      rule: "required",
    },
  ])
  .addField("#email", [
    {
      rule: "required",
    },
    {
      rule: "email",
    },
    {
      validator: async (value) => {
        // Asynchrone fetch-aanroep om te controleren of de e-mail al bestaat
        const response = await fetch(
          "validate-email.php?email=" + encodeURIComponent(value)
        );
        const json = await response.json();

        // Return true als e-mail beschikbaar is, anders false
        return json.available;
      },
      errorMessage: "Email is al in gebruik",
    },
  ])
  .addField("#password", [
    {
      rule: "required",
    },
    {
      rule: "password",
    },
  ])
  .addField("#password_confirmation", [
    {
      validator: (value, fields) => {
        return value === fields["#password"].elem.value;
      },
      errorMessage: "Wachtwoorden komen niet overeen",
    },
  ])
  .onSuccess((event) => {
    document.getElementById("signup").submit();
  });
