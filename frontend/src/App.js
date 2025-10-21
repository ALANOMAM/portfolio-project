import React from "react";
import Header from "./components/Header";
import { Routes, Route, Link } from "react-router-dom";
import HomePage from "./pages/HomePage";
import AboutPage from "./pages/AboutPage";
import AiPage from "./pages/AiPage";
import FullStackPage from "./pages/FullStackPage";
import BlockchainPage from "./pages/BlockchainPage";
import DevOpsPage from "./pages/DevOpsPage";
import MatrixBackground from "./components/MatrixBackground";

function App() {
  return (
    <>
      <MatrixBackground />
      <div>
        {/* header where the navigation links are */}
        <Header />

        {/* Route definitions */}
        <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="/about" element={<AboutPage />} />
          <Route path="/ai" element={<AiPage />} />
          <Route path="/full-stack" element={<FullStackPage />} />
          <Route path="/blockchain" element={<BlockchainPage />} />
          <Route path="/devops" element={<DevOpsPage />} />
        </Routes>
      </div>
    </>
  );
}

export default App;
