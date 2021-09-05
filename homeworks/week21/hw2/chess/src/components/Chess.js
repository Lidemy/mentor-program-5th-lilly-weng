import styled from "styled-components";
import React from "react";
import Board from "./Board";
import findTheWinner from "./Rule";
const { useState } = React;

const AppWrapper = styled.div`
  min-height: 100vh;
  justify-content: center;
  background-color: #1ad6cc;
`;
const H1 = styled.div`
  text-align: center;
  font-size: 48px;
  font-weight: bold;
  color: black;
`;
const H3 = styled.div`
  text-align: center;
  font-size: 24px;
  color: black;
`;
const Information = ({ blackOrWhite, winner }) => {
  return (
    <div>
      <H1>五子棋</H1>
      <H3>{winner ? `Winner: ${winner}` : `Next: ${blackOrWhite}`}</H3>
    </div>
  );
};

const Chess = () => {
  const [board, setBoard] = useState(Array(8).fill(Array(8).fill(null)));
  const [stepPlayed, setStepPlayed] = useState(0);
  const [blackIsNext, setBlackIsNext] = useState(true);
  const [currentX, setCurrentX] = useState(null);
  const [currentY, setCurrentY] = useState(null);
  const blackOrWhite = blackIsNext ? "black" : "white";
  const winner = findTheWinner(board, currentX, currentY);
  const handleMove = (xIndex, yIndex) => {
    setCurrentX(xIndex);
    setCurrentY(yIndex);
    const squares = [...board];
    if (winner || squares[yIndex][xIndex]) return;
    setBoard(
      squares.map((row, currentY) => {
        // 不是要改的
        if (currentY !== yIndex) return row;
        // 要改的
        return row.map((col, currentX) => {
          if (currentX !== xIndex) return col;
          return blackOrWhite;
        });
      })
    );
    setStepPlayed(stepPlayed + 1);
    setBlackIsNext(!blackIsNext);
  };

  return (
    <AppWrapper>
      <Information blackOrWhite={blackOrWhite} winner={winner} />
      <Board squares={board} onClick={handleMove} />
    </AppWrapper>
  );
};

export default Chess;
