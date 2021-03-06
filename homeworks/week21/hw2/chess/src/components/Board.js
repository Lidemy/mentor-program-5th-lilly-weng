import styled from "styled-components";
import React from "react";
import Square from "./Square";

const BoardBox = styled.div`
  margin: 20px auto;
  height: 200px;
  width: 200px;
  background-color: #faa239;
`;
const Row = styled.div`
  clear: both;
`;

const Board = ({ squares, onClick }) => {
  return (
    <BoardBox>
      {squares.map((row, yIndex) => (
        <Row key={yIndex}>
          {row.map((col, xIndex) => (
            <Square
              key={xIndex}
              value={col}
              onClick={() => onClick(xIndex, yIndex)}
            />
          ))}
        </Row>
      ))}
    </BoardBox>
  );
};

export default Board;
