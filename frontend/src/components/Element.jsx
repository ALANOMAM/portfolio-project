import React, { useRef } from "react";

import { Canvas, useFrame } from "@react-three/fiber";

function SpinningMesh() {
  //ref to target the mesh
  const mesh = useRef(null);
  // used to animate our object, we called it here after having imported it above
  useFrame(() => {
    mesh.current.rotation.x = mesh.current.rotation.y += 0.01;
  });
  return (
    <>
      <group ref={mesh}>
        <mesh>
          <octahedronGeometry attach="geometry" args={[3]} />
          <meshBasicMaterial attach="material" color="green" />
        </mesh>
        <mesh>
          <octahedronGeometry attach="geometry" args={[3]} />
          <meshBasicMaterial attach="material" color="white" wireframe={true} />
        </mesh>
      </group>
    </>
  );
}

function Element() {
  return (
    <>
      <Canvas>
        <SpinningMesh></SpinningMesh>
      </Canvas>
    </>
  );
}

export default Element;
