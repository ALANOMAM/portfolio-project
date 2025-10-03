import React from "react";
import { Menubar } from "primereact/menubar";
import { useNavigate } from "react-router-dom";

function Header() {
  const navigate = useNavigate();
  const items = [
    {
      label: "Home",
      icon: "pi pi-home",
      command: () => navigate("/"),
    },
    {
      label: "About",
      icon: "pi pi-info-circle",
      command: () => navigate("/about"),
    },
    {
      label: "Work",
      icon: "pi pi-briefcase",
      items: [
        {
          label: "Ai agents",
          icon: "pi pi-microchip-ai",
          command: () => navigate("/ai"),
        },
        {
          label: "Full stack development",
          icon: "pi pi-code",
          command: () => navigate("/full-stack"),
        },
        {
          label: "Blockchain",
          icon: "pi pi-ethereum",
          command: () => navigate("/blockchain"),
        },
      ],
    },
  ];

  return (
    <div className="card">
      <Menubar model={items} />
    </div>
  );
}

export default Header;
